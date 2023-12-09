<?php

namespace App\Http\Controllers\Api\v1;

use App\Facades\Document;
use App\Http\Controllers\Controller;
use App\Http\Requests\Document\AddDocumentRequest;

class DocumentController extends Controller
{
    public function add(AddDocumentRequest $request)
    {
        Document::setProject($request->input('projectId'))
            ->add($request->input('documents'));
        return responseCreated();
    }
}
