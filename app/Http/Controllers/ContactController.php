<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact.show');
    }

    public function send(ContactFormRequest $request)
    {
        // upload photo file
        $filePath = $this->upload($request->file('image'));

        $fullName = $request->get('firstname').' '.$request->get('lastname');

        \Mail::send('emails.contact', array(
                'fullName' => $fullName,
                'email' => $request->get('email'),
                'body' => $request->get('message'),
                'file' => $filePath,
            ), function($message) 
            {
                $message->from('noreplay@lazy-ants.com');
                $message->to('alex@lazy-ants.com', 'Alex')->subject('You get new Feedback, boom!');
            }
        );

        return \Redirect::route('contact_show', array('locale' => \Lang::getLocale()))
            ->with('message', 'Thanks for your feedback, we\'ll get to you asap!');
    }

    protected function upload($file)
    {
        if ($file->isValid()) {
            $fileName = (new \DateTime())->format('d.m.Y-hsi').'.'.$file->guessExtension();
            $file->move(storage_path() . '/uploads', $fileName);
            return storage_path() . '/uploads/' . $fileName;
        } else {
            return \Redirect::route('contact_show')
                ->with('message', 'Uploaded file is not valid!');
        }        
    }
}
