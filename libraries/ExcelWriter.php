<?php

require_once "Spreadsheet/Excel/Writer.php";

class ExcelWriter extends Spreadsheet_Excel_Writer
{
    public function createNewWorkBook($file_name)
    {
        $workbook = new Spreadsheet_Excel_Writer($file_name);
        $workbook->setVersion(8);
        return $workbook;
    }

    public function createNewWorkSheet($workbook, $sheet_name = 1)
    {
        $sheet_name = is_integer($sheet_name) ? "Sheet $sheet_name" : $sheet_name;
        $worksheet  = &$workbook->addWorksheet($sheet_name);
        return $worksheet;
    }

    public function getMainHeaderFormat($workbook)
    {
        $main_header_format = &$workbook->addFormat();
        $main_header_format->setBold();
        $main_header_format->setAlign('left');

        return $main_header_format;
    }

    public function getSubHeaderFormat($workbook)
    {
        $detail_header_format = &$workbook->addFormat();
        $detail_header_format->setBold();
        $detail_header_format->setAlign('center');
        $detail_header_format->setVAlign('middle');
        $detail_header_format->setBorder(1);
        $detail_header_format->setTextWrap();

        return $detail_header_format;
    }

    public function getDetailFormat($workbook)
    {
        $detail_format = &$workbook->addFormat();
        $detail_format->setAlign('center');
        $detail_format->setVAlign('middle');
        $detail_format->setBorder(1);

        return $detail_format;
    }

    public function writeMainHeader(&$row, &$col, $headers, $worksheet, $format)
    {
        foreach ($headers as $header) {
            $worksheet->writeString($row, $col, $header, $format);
            $row++;
        }
        $row++;
    }

    public function writeSubHeader(&$row, &$col, $headers, $worksheet, $format)
    {
        foreach ($headers as $header) {
            $worksheet->writeString($row, $col, $header, $format);
            $col++;
        }
        $row++;
        $col = 0;
    }

    public function save($worksheets, $workbook)
    {
        foreach ($worksheets as $worksheet) {
            if (PEAR::isError($worksheet)) {
                echo 'Error on sheet ' . $worksheet->name;
                return false;
            }
        }

        echo $workbook->_filename . " \033[32m[SAVED]\033[37m\n";
        $workbook->close();
    }
}
