<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;

class PDFController extends Controller
{
    public function generateDocumentPDf($id)
    {   
        $document = Document::findOrFail($id);

        return Pdf::view('pdf.document', ['document' => $document])
            ->landscape()
            ->format('a4')
            ->name('document ' . $document->document_id);
    }
}
