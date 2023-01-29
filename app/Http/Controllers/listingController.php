<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class listingController extends Controller
{
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function show($lang, $id)
    {
        $listing = Listing::find($id);

        return $listing ? view('listings.show', ['listing' => $listing]) : abort('404');
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $formFields = request()->validate([
            'company' => 'required',
            'title' => ['required', Rule::unique('listings', 'title')],
            'email' => ['required', 'email', Rule::unique('listings', 'email')],
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if (request()->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Job was added successfully!');
    }

    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listings' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized action!');
        }

        $formFields = request()->validate([
            'company' => 'required',
            'title' => 'required',
            'email' => ['required', 'email'],
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if (request()->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Job was updated successfully!');
    }

    public function destroy(Listing $listing)
    {
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized action!');
        }

        $listing->delete();

        return redirect('/')->with('message', 'Job was deleted successfully!');
    }

    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
