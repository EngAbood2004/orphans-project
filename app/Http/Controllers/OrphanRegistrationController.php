<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrphanRegistrationRequest;
use App\Services\OrphanRegistrationService;
use App\Models\Guardian;

class OrphanRegistrationController extends Controller
{
    protected OrphanRegistrationService $service;

    public function __construct(OrphanRegistrationService $service)
    {
        $this->service = $service;
    }

    /**
     * عرض صفحة التسجيل
     */
    public function create()
    {
        return view('register');
    }

    /**
     *
     * حفظ البيانات
     */
    public function store(OrphanRegistrationRequest $request)
    {
        // الـ Request قام بالـ Validation تلقائياً
        $validatedData = $request->validated();

        // الـ Service يقوم بحفظ البيانات
        $guardian = $this->service->store($validatedData);

        return redirect()
            ->route('register')
            ->with('success', 'تم حفظ بيانات ' . $guardian->full_name . ' بنجاح! 🎉');
    }

    /**
     * عرض قائمة المسجلين
     */
    public function index()
    {
        $guardians = Guardian::with(['father', 'mother', 'orphans'])->get();
        return view('list', compact('guardians'));

    }
}
