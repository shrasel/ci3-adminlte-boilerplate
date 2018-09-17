<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?=$title?></title>
   <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
  
  <style type="text/css">
    @page { margin: 0 }
      body { margin: 0 }
      .sheet {
        margin: 0;
        overflow: hidden;
        position: relative;
        box-sizing: border-box;
        page-break-after: always;
      }

      /** Paper sizes **/
      body.A3           .sheet { width: 297mm; height: 419mm }
      body.A3.landscape .sheet { width: 420mm; height: 296mm }
      body.A4           .sheet { width: 210mm;  }
      body.A4.landscape .sheet { width: 297mm; height: 209mm }
      body.A5           .sheet { width: 148mm; height: 209mm }
      body.A5.landscape .sheet { width: 210mm; height: 147mm }

      /** Padding area **/
      .sheet.padding-10mm { padding: 10mm }
      .sheet.padding-15mm { padding: 15mm }
      .sheet.padding-20mm { padding: 20mm }
      .sheet.padding-25mm { padding: 25mm }

      /** For screen preview **/
      @media screen {
        body { background: #e0e0e0 }
        .sheet {
          background: white;
          box-shadow: 0 .5mm 2mm rgba(0,0,0,.3);
          margin: 5mm;
        }
      }

    table.table { page-break-after:auto }
    table.table tr    { page-break-inside:avoid; page-break-after:auto }
    table.table td    { page-break-inside:avoid; page-break-after:auto }
    table.table thead { display:table-header-group; margin-top:50px; }
    table.table tfoot { display:table-footer-group }


      /** Fix for Chrome issue #273306 **/
      @media print {
                 body.A3.landscape { width: 420mm }
        body.A3, body.A4.landscape { width: 297mm }
        body.A4, body.A5.landscape { width: 210mm }
        body.A5                    { width: 148mm }
      }
  </style>
  <link rel="stylesheet" href="<?=base_url()?>assets/css/print.css">
  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { size: A4 }
  
  .header{
    border-bottom: 1px solid #999; 
    margin-bottom: 20px;
    padding-bottom: 8px;
  }
  
  .footer{
    position: absolute; 
    text-align: center;
    bottom: 0;
    left: 0;
    border-top: 1px solid #000;
    margin-top: 10px;
    padding:10px 0;
    width: 100%;
  }

  .footer img{
    width: 90%;
  }
  </style>
</head>
<body class="A4">
  <?php $this->load->view($content);?>
</body>
</html>