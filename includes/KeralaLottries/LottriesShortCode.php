<?php
require_once __DIR__ . '/KeralaLottries.php';
function lottriesShortCode()
{
    $lottriesView = getLottriesData();
    return $lottriesView . "
<script>
function getLotteryPdf(serialNum){
    var fileName='LotteryFile';
    fetch(window.location.origin+'/wp-json/keralaLottries/'+serialNum).then((result) => {
        const header = result.headers.get('Content-Disposition');
        const parts = header.split(';');
        filename = parts[1].split('=')[1];
        return result.blob()}).then(b => {
  const url = window.URL.createObjectURL(b);
  var a = document.createElement('a');
  document.body.appendChild(a);
  a.style = 'display: none';
  a.href = url;
  a.download = filename;
  a.click();
  window.URL.revokeObjectURL(url);
})
}
</script>
    ";
}
