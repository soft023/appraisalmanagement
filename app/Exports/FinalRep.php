<?php

namespace App\Exports;

use App\Finalreport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FinalRep implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Finalreport::all();
    }

     public function headings(): array

    {

        return [
            '#',
            'period',
            'firstname',
            'lastname',
            'userid',
            'staffid',
            'phone',
            'email',
            'dob',
            'gender',
            'position',
            'department',
            'grade',
            'depositactual',
            'deposittarget',
            'depositweight',            
            'riskactual',
            'risktarget',
            'riskweight',            
            'accountactual',
            'accounttarget',
            'accountweight',
            'quantitativescore',
            'qualitativescore',
            'totalscore',
            'interpretation',
            'reference',

        ];

    }
}
