<?php

class KL_AccessExternalResource
{
    public function getLottriesData()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://103.251.43.52/lottery/weblotteryresult.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
                'Accept-Language: en-US,en;q=0.9,ur;q=0.8',
                'Connection: keep-alive',
                'Referer: http://www.keralalotteries.com/',
                'Upgrade-Insecure-Requests: 1',
                'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
                'Cookie: PHPSESSID=tapgcsg1t4sfi5h26a4raef255',
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    public function getFilename($header)
    {
        try {
            if (preg_match('/Content-Disposition:.*?filename="(.+?)"/', $header, $matches)) {
                return $matches[1];
            }
            if (preg_match('/Content-Disposition:.*?filename=([^; ]+)/', $header, $matches)) {
                return rawurldecode($matches[1]);
            }
            throw new Exception("Filename not found");
        } catch (\Throwable$th) {
            error_log($th);
            return "LotteryPdf";
        }
    }

    public function getLottriesPdfFile($serialNum)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://103.251.43.52/lottery/viewlotisresult.php?drawserial={$serialNum}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Referer: http://www.keralalotteries.com/',
                'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
                'Cookie: PHPSESSID=j2tj00ilqlqpucep4hme7hiq90',
                'Content-Type: application/pdf',
            ),
        ));

        $response = curl_exec($curl);

        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $headerStr = substr($response, 0, $headerSize);
        $bodyStr = substr($response, $headerSize);

        curl_close($curl);
        $fileName = $this->getFilename($headerStr);
        header('Content-type: application/pdf');
        header("Content-Disposition: attachment;filename={$fileName}");
        echo $bodyStr;
    }
}
