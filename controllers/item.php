<?php
    require 'vendor/autoload.php';

    use Endroid\QrCode\Builder\Builder;
    use Endroid\QrCode\Encoding\Encoding;
    use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
    use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
    use Endroid\QrCode\Label\Font\NotoSans;
    use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
    use Endroid\QrCode\Writer\PngWriter;


    if ($action == "edit") {

            $tData['selected_item'] = $Item->find(array('id'=>$_GET['id']))[0];

            $action = "index";
        
        }

    if ($action == "index") {

            $tData['items'] = $Item->find(array('status'=>'active'));

            $data['content'] = loadTemplate('item.tpl.php', $tData);
    }

    if ($action =="save") {

        foreach ($_POST['name'] as $key => $value) {
            $tData['name'] = $_POST['name'][$key];
            $tData['status'] = $_POST['status'][$key];
            $tData['created_by'] = $_SESSION['member']['id'];

            if ($_POST['id'][$key]!= '') {

                $tData['updated_at'] = date('Y-m-d H:i:s');

                $tData['updated_by'] = $_SESSION['member']['id'];
                
                $Item->update($_POST['id'][$key], $tData);
                
            }else{
                

                    $maxID = $Item->maxID();

                    $forBarcode = str_pad($maxID['maxID'] + 1, 6, "0", STR_PAD_LEFT);

                    $date = explode("-", TODAY);

                    $today = $date[0] . $date[1] . $date[2];

                    $tData['barcode'] = $today . "" . $forBarcode;

                    $result = Builder::create()
                        ->writer(new PngWriter())
                        ->writerOptions([])
                        ->data($tData['barcode'])
                        ->encoding(new Encoding('UTF-8'))
                        ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
                        ->size(300)
                        ->margin(10)
                        ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
                        ->labelText('Hope')
                        ->labelFont(new NotoSans(20))
                        ->labelAlignment(new LabelAlignmentCenter())
                        ->validateResult(false)
                        ->build();

                         // Directly output the QR code
                        header('Content-Type: '.$result->getMimeType());
                        echo $result->getString();

                        // Save it to a file
                        $result->saveToFile('images/qr_codes/'.$tData['barcode'].'.png');

                        // Generate a data URI to include image data inline (i.e. inside an <img> tag)
                        $dataUri = $result->getDataUri();

                    $Item->insert($tData);

            }
            
        }
        $_SESSION['message']="Infomation Saved Successfull";
        redirect("item", "index");

        
    }

    if ($action == "delete") {
        $tData['status'] = "inactive";
        $tData['deleted_at'] = date("Y-m-d H:i:s");
        $tData['deleted_by'] = $_SESSION['member']['id'];

        $Item->update($_GET['id'], $tData);
        $_SESSION['message']="Infomation Saved Successfull";
        
        redirect("item", "index");
    }

?>