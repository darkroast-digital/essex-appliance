<?php

namespace App\Http\Controllers\Panel;

use App\Post;
use Analytics;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // #DATES
        // =========================================================================

        // Date variables
        $now = Carbon::now();
        $today = Carbon::today();
        $daysAgo1 = Carbon::now()->subDays(1);
        $daysAgo2 = Carbon::now()->subDays(2);
        $daysAgo3 = Carbon::now()->subDays(3);
        $daysAgo4 = Carbon::now()->subDays(4);
        $daysAgo5 = Carbon::now()->subDays(5);
        $daysAgo6 = Carbon::now()->subDays(6);

        // Weekday labels array
        $weekdayLabels = [Carbon::now()->subDays(6)->format('l'), Carbon::now()->subDays(5)->format('l'), Carbon::now()->subDays(4)->format('l'), Carbon::now()->subDays(3)->format('l'), Carbon::now()->subDays(2)->format('l'), Carbon::now()->subDays(1)->format('l'), Carbon::now()->format('l')];
        $weekdayLabels = json_encode($weekdayLabels);

        // #USERS
        // =========================================================================

        // Number of users
        $users = Analytics::performQuery(
            Period::days(7),
            'ga:users'
        );
        $users = $users['rows'][0][0];

        // Users currently on site
        $currentUsers = Analytics::performQuery(
            Period::create($now, $now),
            'ga:users'
        );
        $currentUsers = $currentUsers['rows'][0][0];

        // New users
        $newUsers = Analytics::performQuery(
            Period::days(7),
            'ga:newUsers'
        );
        $newUsers = $newUsers['rows'][0][0];

        // New users by day
        $newUsersToday = Analytics::performQuery(
            Period::create($today, $today),
            'ga:newUsers'
        );
        $newUsersToday = $newUsersToday['rows'][0][0];

        $newUsers1DayAgo = Analytics::performQuery(
            Period::create($daysAgo1, $daysAgo1),
            'ga:newUsers'
        );
        $newUsers1DayAgo = $newUsers1DayAgo['rows'][0][0];

        $newUsers2DaysAgo = Analytics::performQuery(
            Period::create($daysAgo2, $daysAgo2),
            'ga:newUsers'
        );
        $newUsers2DaysAgo = $newUsers2DaysAgo['rows'][0][0];

        $newUsers3DaysAgo = Analytics::performQuery(
            Period::create($daysAgo3, $daysAgo3),
            'ga:newUsers'
        );
        $newUsers3DaysAgo = $newUsers3DaysAgo['rows'][0][0];

        $newUsers4DaysAgo = Analytics::performQuery(
            Period::create($daysAgo4, $daysAgo4),
            'ga:newUsers'
        );
        $newUsers4DaysAgo = $newUsers4DaysAgo['rows'][0][0];

        $newUsers5DaysAgo = Analytics::performQuery(
            Period::create($daysAgo5, $daysAgo5),
            'ga:newUsers'
        );
        $newUsers5DaysAgo = $newUsers5DaysAgo['rows'][0][0];

        $newUsers6DaysAgo = Analytics::performQuery(
            Period::create($daysAgo6, $daysAgo6),
            'ga:newUsers'
        );
        $newUsers6DaysAgo = $newUsers6DaysAgo['rows'][0][0];

        // #SESSIONS
        // =========================================================================

        // Number of sessions that week
        $sessions = Analytics::performQuery(
            Period::days(7),
            'ga:sessions'
        );
        $sessions = $sessions['rows'][0][0];

        // Number of sessions each day for a week
        $sessionsToday = Analytics::performQuery(
            Period::create($today, $today),
            'ga:sessions'
        );
        $sessionsToday = $sessionsToday['rows'][0][0];

        $sessions1DayAgo = Analytics::performQuery(
            Period::create($daysAgo1, $daysAgo1),
            'ga:sessions'
        );
        $sessions1DayAgo = $sessions1DayAgo['rows'][0][0];

        $sessions2DaysAgo = Analytics::performQuery(
            Period::create($daysAgo2, $daysAgo2),
            'ga:sessions'
        );
        $sessions2DaysAgo = $sessions2DaysAgo['rows'][0][0];

        $sessions3DaysAgo = Analytics::performQuery(
            Period::create($daysAgo3, $daysAgo3),
            'ga:sessions'
        );
        $sessions3DaysAgo = $sessions3DaysAgo['rows'][0][0];

        $sessions4DaysAgo = Analytics::performQuery(
            Period::create($daysAgo4, $daysAgo4),
            'ga:sessions'
        );
        $sessions4DaysAgo = $sessions4DaysAgo['rows'][0][0];

        $sessions5DaysAgo = Analytics::performQuery(
            Period::create($daysAgo5, $daysAgo5),
            'ga:sessions'
        );
        $sessions5DaysAgo = $sessions5DaysAgo['rows'][0][0];

        $sessions6DaysAgo = Analytics::performQuery(
            Period::create($daysAgo6, $daysAgo6),
            'ga:sessions'
        );
        $sessions6DaysAgo = $sessions6DaysAgo['rows'][0][0];

        // #BOUNCE RATE
        // =========================================================================

        $bounceRate = Analytics::performQuery(
            Period::days(7),
            'ga:bounceRate'
        );
        $bounceRate = $bounceRate['rows'][0][0];

        // #PAGEVIEWS
        // =========================================================================

        $pageviews = Analytics::performQuery(
            Period::days(7),
            'ga:pageviews'
        );
        $pageviews = $pageviews['rows'][0][0];

        // #CHART ARRAYS
        // =========================================================================

        // Sessions chart
        $sessionsChartArray = [$sessions6DaysAgo, $sessions5DaysAgo, $sessions4DaysAgo, $sessions3DaysAgo, $sessions2DaysAgo, $sessions1DayAgo, $sessionsToday];
        $sessionsChartArray = json_encode($sessionsChartArray);

        // New users chart
        $newUsersArray = [$newUsers6DaysAgo, $newUsers5DaysAgo, $newUsers4DaysAgo, $newUsers3DaysAgo, $newUsers2DaysAgo, $newUsers1DayAgo, $newUsersToday];
        $newUsersArray = json_encode($newUsersArray);

        // #COMPACT ARRAY
        // =========================================================================

        $compactArray = ['users', 'sessions', 'bounceRate', 'pageviews', 'currentUsers', 'sessionsToday', 'sessions1DayAgo', 'sessions2DaysAgo', 'sessions3DaysAgo', 'sessions4DaysAgo', 'sessions5DaysAgo', 'sessions6DaysAgo', 'newUsers', 'sessionsChartArray', 'weekdayLabels', 'newUsersArray'];

        return view('panel.dashboard.index', compact($compactArray));
    }
}
