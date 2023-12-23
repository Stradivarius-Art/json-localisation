<?php

namespace App\Http\Controllers\Api\v1;

use App\Facades\Document;
use App\Http\Controllers\Controller;
use App\Http\Requests\Document\AddDocumentRequest;
use App\Http\Requests\Document\GetDocumentRequest;
use App\Http\Requests\Document\GetDocumentsRequest;
use App\Http\Requests\Document\ImportTranslationRequest;
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

    public function import(ModelsDocument $document, ImportTranslationRequest $request)
    {
        Document::setDocument($document)
            ->importTranslation(
                $request->input('lang'),
                $request->input('data')
            );
        return responseOk();
    }

    public function show(ModelsDocument $document, GetDocumentRequest $request)
    {
        return Document::setDocument($document)
            ->getTranslations($request->input('lang'));
    }
}