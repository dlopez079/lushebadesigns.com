<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactSection extends Component
{
    /**
     * Here is a list of variables that will store the values entered by the user. 
     * 
     */
    public $name;
    public $email;
    public $phone; 
    public $transmission; 

    /**
     * Here is a list of rules that the values must abid by. 
     * 
     */
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|max:15',
        'transmission' => 'required|min:5'
    ];

    /**
     * If the user does not listen to the rules, spit out these custom messages.
     * 
     */
    protected $messages = [
        'name.required' => "A name is required for the above field.",
        'email.required' => 'You cannot leave this blank!',
        'email.email' => 'Please look at email again!'
    ];
    
    /**
     * Pass all property names through the update method and valid in real time.
     * 
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }
    

    public function submitForm()
    {
        // Validate before running the submitForm function. 
        $this->validate();

        // I used the line below to test if the information is being captured by the form. It is currently commented out.
        // dd($this->name, $this->email, $this->phone, $this->message);
        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'transmission' => $this->transmission
        ]);
    
        // Reset the fields in the form
        $this->reset();

        // Display a success message to your users if validated and text is entered onto database. 
        session()->flash('message', 'Your transmission is successfully sent.');

        // Send message to info@lushebadesigns.com Not ready for production.
        // \Illuminate\Support\Facades\Mail::send(new \App\Mail\ContactEmail());  
        return view('welcome');
    }

    public function render()
    {
        return view('livewire.contact-section');
    }
}
