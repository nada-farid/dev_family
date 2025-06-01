<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id' => 1,
                'title' => 'user_management_access',
            ],
            [
                'id' => 2,
                'title' => 'permission_create',
            ],
            [
                'id' => 3,
                'title' => 'permission_edit',
            ],
            [
                'id' => 4,
                'title' => 'permission_show',
            ],
            [
                'id' => 5,
                'title' => 'permission_delete',
            ],
            [
                'id' => 6,
                'title' => 'permission_access',
            ],
            [
                'id' => 7,
                'title' => 'role_create',
            ],
            [
                'id' => 8,
                'title' => 'role_edit',
            ],
            [
                'id' => 9,
                'title' => 'role_show',
            ],
            [
                'id' => 10,
                'title' => 'role_delete',
            ],
            [
                'id' => 11,
                'title' => 'role_access',
            ],
            [
                'id' => 12,
                'title' => 'user_create',
            ],
            [
                'id' => 13,
                'title' => 'user_edit',
            ],
            [
                'id' => 14,
                'title' => 'user_show',
            ],
            [
                'id' => 15,
                'title' => 'user_delete',
            ],
            [
                'id' => 16,
                'title' => 'user_access',
            ],
            [
                'id' => 17,
                'title' => 'slider_create',
            ],
            [
                'id' => 18,
                'title' => 'slider_edit',
            ],
            [
                'id' => 19,
                'title' => 'slider_show',
            ],
            [
                'id' => 20,
                'title' => 'slider_delete',
            ],
            [
                'id' => 21,
                'title' => 'slider_access',
            ],
            [
                'id' => 22,
                'title' => 'service_create',
            ],
            [
                'id' => 23,
                'title' => 'service_edit',
            ],
            [
                'id' => 24,
                'title' => 'service_show',
            ],
            [
                'id' => 25,
                'title' => 'service_delete',
            ],
            [
                'id' => 26,
                'title' => 'service_access',
            ],
            [
                'id' => 27,
                'title' => 'project_create',
            ],
            [
                'id' => 28,
                'title' => 'project_edit',
            ],
            [
                'id' => 29,
                'title' => 'project_show',
            ],
            [
                'id' => 30,
                'title' => 'project_delete',
            ],
            [
                'id' => 31,
                'title' => 'project_access',
            ],
            [
                'id' => 32,
                'title' => 'news_create',
            ],
            [
                'id' => 33,
                'title' => 'news_edit',
            ],
            [
                'id' => 34,
                'title' => 'news_show',
            ],
            [
                'id' => 35,
                'title' => 'news_delete',
            ],
            [
                'id' => 36,
                'title' => 'news_access',
            ],
            [
                'id' => 37,
                'title' => 'said_about_us_create',
            ],
            [
                'id' => 38,
                'title' => 'said_about_us_edit',
            ],
            [
                'id' => 39,
                'title' => 'said_about_us_show',
            ],
            [
                'id' => 40,
                'title' => 'said_about_us_delete',
            ],
            [
                'id' => 41,
                'title' => 'said_about_us_access',
            ],
            [
                'id' => 42,
                'title' => 'partner_create',
            ],
            [
                'id' => 43,
                'title' => 'partner_edit',
            ],
            [
                'id' => 44,
                'title' => 'partner_show',
            ],
            [
                'id' => 45,
                'title' => 'partner_delete',
            ],
            [
                'id' => 46,
                'title' => 'partner_access',
            ],
            [
                'id' => 47,
                'title' => 'hawkma_mangment_access',
            ],
            [
                'id' => 48,
                'title' => 'hawkam_category_create',
            ],
            [
                'id' => 49,
                'title' => 'hawkam_category_edit',
            ],
            [
                'id' => 50,
                'title' => 'hawkam_category_show',
            ],
            [
                'id' => 51,
                'title' => 'hawkam_category_delete',
            ],
            [
                'id' => 52,
                'title' => 'hawkam_category_access',
            ],
            [
                'id' => 53,
                'title' => 'hawkma_create',
            ],
            [
                'id' => 54,
                'title' => 'hawkma_edit',
            ],
            [
                'id' => 55,
                'title' => 'hawkma_show',
            ],
            [
                'id' => 56,
                'title' => 'hawkma_delete',
            ],
            [
                'id' => 57,
                'title' => 'hawkma_access',
            ],
            [
                'id' => 58,
                'title' => 'report_mangment_access',
            ],
            [
                'id' => 59,
                'title' => 'report_category_create',
            ],
            [
                'id' => 60,
                'title' => 'report_category_edit',
            ],
            [
                'id' => 61,
                'title' => 'report_category_show',
            ],
            [
                'id' => 62,
                'title' => 'report_category_delete',
            ],
            [
                'id' => 63,
                'title' => 'report_category_access',
            ],
            [
                'id' => 64,
                'title' => 'report_create',
            ],
            [
                'id' => 65,
                'title' => 'report_edit',
            ],
            [
                'id' => 66,
                'title' => 'report_show',
            ],
            [
                'id' => 67,
                'title' => 'report_delete',
            ],
            [
                'id' => 68,
                'title' => 'report_access',
            ],
            [
                'id' => 69,
                'title' => 'report_money_create',
            ],
            [
                'id' => 70,
                'title' => 'report_money_edit',
            ],
            [
                'id' => 71,
                'title' => 'report_money_show',
            ],
            [
                'id' => 72,
                'title' => 'report_money_delete',
            ],
            [
                'id' => 73,
                'title' => 'report_money_access',
            ],
            [
                'id' => 74,
                'title' => 'gallery_create',
            ],
            [
                'id' => 75,
                'title' => 'gallery_edit',
            ],
            [
                'id' => 76,
                'title' => 'gallery_show',
            ],
            [
                'id' => 77,
                'title' => 'gallery_delete',
            ],
            [
                'id' => 78,
                'title' => 'gallery_access',
            ],
            [
                'id' => 79,
                'title' => 'volunteering_managment_access',
            ],
            [
                'id' => 80,
                'title' => 'volunteer_create',
            ],
            [
                'id' => 81,
                'title' => 'volunteer_edit',
            ],
            [
                'id' => 82,
                'title' => 'volunteer_show',
            ],
            [
                'id' => 83,
                'title' => 'volunteer_delete',
            ],
            [
                'id' => 84,
                'title' => 'volunteer_access',
            ],
            [
                'id' => 85,
                'title' => 'volunteer_guide_create',
            ],
            [
                'id' => 86,
                'title' => 'volunteer_guide_edit',
            ],
            [
                'id' => 87,
                'title' => 'volunteer_guide_show',
            ],
            [
                'id' => 88,
                'title' => 'volunteer_guide_delete',
            ],
            [
                'id' => 89,
                'title' => 'volunteer_guide_access',
            ],
            [
                'id' => 90,
                'title' => 'member_create',
            ],
            [
                'id' => 91,
                'title' => 'member_edit',
            ],
            [
                'id' => 92,
                'title' => 'member_show',
            ],
            [
                'id' => 93,
                'title' => 'member_delete',
            ],
            [
                'id' => 94,
                'title' => 'member_access',
            ],
            [
                'id' => 95,
                'title' => 'contact_mangment_access',
            ],
            [
                'id' => 96,
                'title' => 'contact_create',
            ],
            [
                'id' => 97,
                'title' => 'contact_edit',
            ],
            [
                'id' => 98,
                'title' => 'contact_show',
            ],
            [
                'id' => 99,
                'title' => 'contact_delete',
            ],
            [
                'id' => 100,
                'title' => 'contact_access',
            ],
            [
                'id' => 101,
                'title' => 'subscribe_create',
            ],
            [
                'id' => 102,
                'title' => 'subscribe_edit',
            ],
            [
                'id' => 103,
                'title' => 'subscribe_show',
            ],
            [
                'id' => 104,
                'title' => 'subscribe_delete',
            ],
            [
                'id' => 105,
                'title' => 'subscribe_access',
            ],
            [
                'id' => 106,
                'title' => 'setting_edit',
            ],
            [
                'id' => 107,
                'title' => 'setting_access',
            ],
            [
                'id' => 108,
                'title' => 'director_create',
            ],
            [
                'id' => 109,
                'title' => 'director_edit',
            ],
            [
                'id' => 110,
                'title' => 'director_show',
            ],
            [
                'id' => 111,
                'title' => 'director_delete',
            ],
            [
                'id' => 112,
                'title' => 'director_access',
            ],
            [
                'id' => 113,
                'title' => 'beneficiary_create',
            ],
            [
                'id' => 114,
                'title' => 'beneficiary_edit',
            ],
            [
                'id' => 115,
                'title' => 'beneficiary_show',
            ],
            [
                'id' => 116,
                'title' => 'beneficiary_delete',
            ],
            [
                'id' => 117,
                'title' => 'beneficiary_access',
            ],
            [
                'id' => 118,
                'title' => 'value_create',
            ],
            [
                'id' => 119,
                'title' => 'value_edit',
            ],
            [
                'id' => 120,
                'title' => 'value_show',
            ],
            [
                'id' => 121,
                'title' => 'value_delete',
            ],
            [
                'id' => 122,
                'title' => 'value_access',
            ],
            [
                'id' => 123,
                'title' => 'swot_analysi_create',
            ],
            [
                'id' => 124,
                'title' => 'swot_analysi_edit',
            ],
            [
                'id' => 125,
                'title' => 'swot_analysi_show',
            ],
            [
                'id' => 126,
                'title' => 'swot_analysi_delete',
            ],
            [
                'id' => 127,
                'title' => 'swot_analysi_access',
            ],
            [
                'id' => 128,
                'title' => 'stakeholder_create',
            ],
            [
                'id' => 129,
                'title' => 'stakeholder_edit',
            ],
            [
                'id' => 130,
                'title' => 'stakeholder_show',
            ],
            [
                'id' => 131,
                'title' => 'stakeholder_delete',
            ],
            [
                'id' => 132,
                'title' => 'stakeholder_access',
            ],
            [
                'id' => 133,
                'title' => 'beneficiary_journey_create',
            ],
            [
                'id' => 134,
                'title' => 'beneficiary_journey_edit',
            ],
            [
                'id' => 135,
                'title' => 'beneficiary_journey_show',
            ],
            [
                'id' => 136,
                'title' => 'beneficiary_journey_delete',
            ],
            [
                'id' => 137,
                'title' => 'beneficiary_journey_access',
            ],
            [
                'id' => 138,
                'title' => 'about_association_access',
            ],
            [
                'id' => 139,
                'title' => 'media_center_access',
            ],
            [
                'id' => 140,
                'title' => 'video_create',
            ],
            [
                'id' => 141,
                'title' => 'video_edit',
            ],
            [
                'id' => 142,
                'title' => 'video_show',
            ],
            [
                'id' => 143,
                'title' => 'video_delete',
            ],
            [
                'id' => 144,
                'title' => 'video_access',
            ],
            [
                'id' => 145,
                'title' => 'support_create',
            ],
            [
                'id' => 146,
                'title' => 'support_edit',
            ],
            [
                'id' => 147,
                'title' => 'support_show',
            ],
            [
                'id' => 148,
                'title' => 'support_delete',
            ],
            [
                'id' => 149,
                'title' => 'support_access',
            ],
            [
                'id' => 150,
                'title' => 'membership_access',
            ],
            [
                'id' => 151,
                'title' => 'membership_type_create',
            ],
            [
                'id' => 152,
                'title' => 'membership_type_edit',
            ],
            [
                'id' => 153,
                'title' => 'membership_type_show',
            ],
            [
                'id' => 154,
                'title' => 'membership_type_delete',
            ],
            [
                'id' => 155,
                'title' => 'membership_type_access',
            ],
            [
                'id' => 156,
                'title' => 'profile_password_edit',
            ],
            [
                'id' => 157,
                'title' => 'volunteer_task_create',
            ],
            [
                'id' => 158,
                'title' => 'volunteer_task_edit',
            ],
            [
                'id' =>159,
                'title' => 'volunteer_task_show',
            ],
            [
                'id' => 160,
                'title' => 'volunteer_task_delete',
            ],
            [
                'id' => 161,
                'title' => 'volunteer_task_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
