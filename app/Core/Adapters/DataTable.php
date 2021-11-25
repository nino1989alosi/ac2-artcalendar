<?php

namespace App\Core\Adapters;

class DataTable extends \Yajra\DataTables\Services\DataTable
{
    public function builder()
    {
        return parent::builder()
            ->headerCallback($this->headerCallbackScript())
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5')
            ->minifiedAjax('', $this->extraScripts());
    }

    public function headerCallbackScript($script = null)
    {
        $js = <<<CDATA
function( thead, data, start, end, display ) {
}
CDATA;

        return $script ?: $js;
    }

    public function extraScripts($script = null)
    {
        $js = <<<CDATA
CDATA;

        return $script ?: $js;
    }

}
