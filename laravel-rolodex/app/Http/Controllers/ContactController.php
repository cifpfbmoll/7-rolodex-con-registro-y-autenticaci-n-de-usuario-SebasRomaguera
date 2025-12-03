<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Auth::user()->contacts()->latest()->get();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        Auth::user()->contacts()->create($validated);

        return redirect()->route('contacts.index')
            ->with('success', '¡Contacto añadido exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        $this->authorize('view', $contact);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        $this->authorize('update', $contact);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $this->authorize('update', $contact);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        $contact->update($validated);

        return redirect()->route('contacts.index')
            ->with('success', '¡Contacto actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $this->authorize('delete', $contact);
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', '¡Contacto eliminado exitosamente!');
    }

    /**
     * Export contacts to CSV
     */
    public function export()
    {
        $contacts = Auth::user()->contacts;
        
        $filename = 'contacts_' . date('Y-m-d_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($contacts) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Name', 'Phone', 'Email']);
            
            foreach ($contacts as $contact) {
                fputcsv($file, [
                    $contact->name,
                    $contact->phone,
                    $contact->email,
                ]);
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Show import form
     */
    public function importForm()
    {
        return view('contacts.import');
    }

    /**
     * Import contacts from CSV
     */
    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:2048',
        ]);

        $file = $request->file('csv_file');
        $handle = fopen($file->getPathname(), 'r');
        
        // Skip header
        fgetcsv($handle);
        
        $imported = 0;
        while (($row = fgetcsv($handle)) !== false) {
            if (count($row) >= 1 && !empty(trim($row[0]))) {
                Auth::user()->contacts()->create([
                    'name' => trim($row[0]),
                    'phone' => isset($row[1]) ? trim($row[1]) : null,
                    'email' => isset($row[2]) ? trim($row[2]) : null,
                ]);
                $imported++;
            }
        }
        
        fclose($handle);

        return redirect()->route('contacts.index')
            ->with('success', "¡$imported contactos importados exitosamente!");
    }
}
