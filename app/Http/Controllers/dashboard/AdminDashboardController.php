<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\MedicalTeam;
use App\Models\Pharmacy;
use App\Models\Laboratory;
use App\Models\Payment;
use App\Models\Appointment;
use App\Models\Plan;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $data = [/*
            'medicalTeamsCount' => MedicalTeam::count(),
            'pharmaciesCount' => Pharmacy::count(),
            'laboratoriesCount' => Laboratory::count(),
            'totalProfit' => Payment::sum('amount'),
            'appointmentsCount' => Appointment::count(),
            'plansCount' => Plan::count()*/
        ];

        return view('content.dashboard.dashboards-analytics', $data);
    }
}
