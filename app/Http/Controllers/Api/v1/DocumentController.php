<?php

namespace App\Http\Controllers\Api\v1;

use App\Facades\Document;
use App\Http\Controllers\Controller;
use App\Http\Requests\Document\AddDocumentRequest;
use App\Http\Requests\Document\GetDocumentsRequest;
use App\Http\Resources\Document\GetDocumentsResource;
use App\Models\Document as ModelsDocument;

class DocumentController extends Controller
{
    public function add(AddDocumentRequest $request)
    {
        Document::setProject($request->input('projectId'))
            ->add($request->input('documents'));
        return responseCreated();
    }

    public function list(GetDocumentsRequest $request)
    {
        return GetDocumentsResource::collection(
            Document::setProject($request->get('projectId'))
                ->list());
    }

    public function destroy(ModelsDocument $document)
    {
        $document->delete();
        return responseOk();
    }
}
