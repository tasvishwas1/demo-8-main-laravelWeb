<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;

class AdminDataTableButtonHelper
{

    public static function editButton( $array ): string
    {
        return '<a href="' . $array['route'] . '"
             class="edit-button btn btn-primary"
             data-toggle="tooltip" data-placement="top" title="edit">
             <i class="fa fa-pencil-square align-middle"></i>
             </a>';
    }

    public static function showRedirectButton( $array ): string
    {
        return '<button data-href="' . $array['show_route'] . '"
             class="edit-button btn btn-success"
             data-toggle="tooltip" data-placement="top" title="">
             <i class="fa fa-eye align-middle"></i>
             </button>';
    }

    public static function detailButton( $array ): string
    {
        return '<button data-id="' . $array['id'] . '"
             class="detail-button btn btn-info" data-toggle="tooltip" data-placement="top"
             title="' . trans('admin_string.common_view') . '">
             <i class="fa fa-eye align-middle"></i>
             </button>';
    }

    public static function deleteButton( $array ): string
    {
        return '<button data-id="' . $array['id'] . '"
            class="delete-single btn btn-danger"
            data-toggle="tooltip" data-placement="top" title="delete">
            <i class="fa fa-trash align-middle"></i>
            </button>';
    }

    public static function activeInactiveStatusButton( $array ): string
    {
        if ($array['status'] == 'Active') {
            return '<button data-id="' . $array['id'] . '"
            data-status="inActive" class="status-change btn btn-warning"
            data-effect="effect-fall" data-toggle="tooltip"
            data-placement="top" title="inActive" >
            <i class="fa fa-refresh font-size-16 align-middle"></i></button>';
        } else {
            return '<button data-id="' . $array['id'] . '"
            data-status="active" class="status-change btn btn-warning btn-icon"
            data-effect="effect-fall" data-toggle="tooltip"
            data-placement="top" title="Active" >
            <i class="fa fa-refresh  align-middle"></i></button>';
        }
    }

    public static function statusBadge( $array ): string
    {
        if ($array['status'] == 'Active') {
            return '<span class="badge badge-success">Active</span>';
        } else {
            return '<span class="badge badge-warning">inActive</span>';
        }
    }
}
