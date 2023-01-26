<?php

require_once __DIR__ . '/KL_AccessExternalResource.php';
require_once __DIR__ . '/ProcessLottriesData.php';

function getLottriesData()
{
    $html = "<div>Strange error bro.......</div>";
    try {
        $accessExternalresource = new KL_AccessExternalResource();
        $response = $accessExternalresource->getLottriesData();
        $processRequest = new ProcessLottriesData();
        $html = $processRequest->processHtml($response);
    } catch (\Throwable$th) {
        $html = "<div>Could not get data.</div>";
    } finally {
        return $html;
    }
}

function getLottriesPdfFile($request)
{
    $serialNum = $request['data'];
    $html = "";
    $statusCode = 200;
    try {
        $accessExternalresource = new KL_AccessExternalResource();
        $response = $accessExternalresource->getLottriesPdfFile($serialNum);

    } catch (\Throwable$th) {
        $response = "<div>Could not get data.</div>" . $th;
    } finally {
        return ($response);
    }
}
