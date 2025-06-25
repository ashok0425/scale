<?php
namespace App\Exports;

use App\Models\Crm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CrmsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $startDate;
    protected $endDate;
    protected $keyword;
    protected $type;

    public function __construct($startDate = null, $endDate = null, $keyword = null, $type = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->keyword = $keyword;
        $this->type = $type;
    }

    public function collection()
    {
        $query = Crm::query()->select(
            'id',
            'page',
            'name',
            'email',
            'role',
            'phone',
            'linkedin',
            'city',
            'attachment_link',
            'type',
            'created_at',
            'updated_at',
            'country',
            'message'
        );

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
        } elseif ($this->startDate) {
            $query->whereDate('created_at', '>=', $this->startDate);
        } elseif ($this->endDate) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        if ($this->type !== null) {
            $query->where('type', $this->type);
        }

        if ($this->keyword) {
            $query->where(function ($q) {
                $q->where('name', 'like', "%{$this->keyword}%")
                  ->orWhere('email', 'like', "%{$this->keyword}%")
                  ->orWhere('phone', 'like', "%{$this->keyword}%");
            });
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Page',
            'Name',
            'Email',
            'Role',
            'Phone',
            'LinkedIn',
            'City',
            'Attachment Link',
            'Type',
            'Created At',
            'Updated At',
            'Country',
            'Message'
        ];
    }

    public function map($crm): array
    {
        return [
            $crm->id,
            $crm->page,
            $crm->name,
            $crm->email,
            $crm->role,
            $crm->phone,
            $crm->linkedin,
            $crm->city,
            $crm->attachment_link,
            $this->getTypeLabel($crm->type),
            optional($crm->created_at)->format('Y-m-d H:i'),
            optional($crm->updated_at)->format('Y-m-d H:i'),
            $crm->country,
            $crm->message
        ];
    }

    protected function getTypeLabel($type)
    {
        return match ((int) $type) {
            1 => 'Waitlist',
            2 => 'Priority Access',
            3 => 'PDF Download',
            default => 'Unknown'
        };
    }
}
