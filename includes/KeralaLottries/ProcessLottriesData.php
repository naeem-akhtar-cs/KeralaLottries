<?php

class ProcessLottriesData
{
    public function processHtml($html)
    {
        $html = str_replace('<a  href="viewlotisresult.php?drawserial=', "<div style='cursor:pointer; text-decoration:underline;' onClick='getLotteryPdf(", $html);
        $html = str_replace('" target="_blank" style="text-decoration:none"', ")'", $html);
        $html = str_replace('>View</a></td>', '>Download</div></td>', $html);
        $html = str_replace('<strong>View</strong>', '<strong>Download Pdf</strong>', $html);
        $html = str_replace('<td colspan="3" align="center"> <strong>To View Older draw results in each lottery -&gt;</strong> <a', '', $html);
        $html = str_replace("width: 500px;", '', $html);
        $html = str_replace(['<form id="form1" name="form1" method="post" action="">', '</form>', 'style="width:97%"', 'width="500"', 'style="text-decoration:none"><strong>Click here</strong></a></td>', 'href="detailsofdrawweb.php?" target="_self"', 'style="text-decoration:none"><strong>Click here</strong></a></td>', 'font-family: Verdana, Geneva, Arial, Helvetica, sans-serif ;', 'cellspacing="0"', 'font-family:Arial, Helvetica, sans-serif'], '', $html);
        $html = str_replace('<table border="0" align="center">', '<table border="0" align="center" style="display: block;overflow-x: auto;white-space: nowrap;">', $html);
        $html = str_replace('style="text-decoration:none"', 'rel="noopener noreferrer" style="text-decoration:none"', $html);
        return $html;
    }
}
