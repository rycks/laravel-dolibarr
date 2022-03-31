<?php


namespace Caprel\Dolibarr\Models;

use Caprel\Dolibarr\Models\DolibarrCommonObject;

class DolibarrDocuments extends DolibarrCommonObject
{
    protected $fillable = [
        "id",
        "modulepart",
        "ref",
        "sortfield",
        "sortorder",
        "sqlfilters",
        "objectlabel"
    ];

    protected $attributes = [
        "id" => null,
        "modulepart" => "",
        "id" => "",
        "ref" => "",
        "sortfield" => "t.rowid",
        "sortorder" => "ASC",
        "sqlfilters" => "",
        "objectlabel" => ""
    ];

    public function __construct(array $attributes = [])
    {
        $attributes['objectlabel'] =  "documents";
        parent::__construct($attributes);
    }

    /**
     * add specific download function for document objects
     *
     * @param   string  $module    module name (facture for example)
     * @param   string  $filename  filename to download
     *
     * @return  [type]             [return description]
     */
    public function download($module, $filename) {
        $url = $this->objectlabel . '/download';
        $data = [
            "modulepart" => $module,
            "original_file" => $filename
        ];
        // Log::debug("DolibarrCommonObject::GET download for " . $this->objectlabel . ", url=$url , data request is " . json_encode($data));
        $result = ($this->CallAPI(
            "GET",
            $url,
            $data
        ));
        return $result;
    }

}
