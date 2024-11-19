<?php

namespace App\Http\Controllers;

use App\Models\StrengthHub;
  // تأكد من إضافة الـ Model الصحيح
use Illuminate\Http\Request;

class StrengthHubController extends Controller
{
    // دالة لعرض تفاصيل Strength Hub
    public function show($id)
    {
        // جلب الـ StrengthHub من قاعدة البيانات باستخدام id
        $strengthHub = StrengthHub::findOrFail($id);  // إذا لم يتم العثور عليه، سيظهر خطأ 404

        // تمرير المتغير إلى القالب باستخدام الدالة view
        return view('landing_page.strength_hub.show', compact('strengthHub'));
    }
}
