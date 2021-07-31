<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ContactRepository;
class ContactController extends Controller
{

    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        $contact = $this->contactRepository->getAll();
        return $contact;
    }

    public function show($id)
    {
        $contact = $this->contactRepository->FindById($id);
        return $contact;
    }
}
