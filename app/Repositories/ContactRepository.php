<?php 
namespace App\Repositories; 
use App\Models\Contact;


class ContactRepository
{
    public function getAll()
    {
        $contact = Contact::orderBy('name')
                        ->where('number','LIKE','+%')
                        ->where('active',1)
                        ->get()
                        ->map(function($contact){
                            return $this->format($contact);
                        });
        return $contact;
    }

    public function FindById($id)
    {
        $contact = Contact::where('id',$id)->firstOrFail();

        return $this->format($contact);
    }

    public function format($contact)
    {
        return [
                    'contact_id'    => $contact->id,
                    'name'          => $contact->name,
                    'number'        => $contact->number,
                    'status'        => $contact->active ? 'Active' : 'inActive',
                ];
    }
}