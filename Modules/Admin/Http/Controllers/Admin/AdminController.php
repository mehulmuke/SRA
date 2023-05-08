<?php

namespace Modules\Admin\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\User\Entities\User;
use Modules\User\Entities\Role;
use Illuminate\Support\Carbon;
use Modules\Files\Entities\Files;
class AdminController extends Controller
{
    /**
     * Display the dashboard with its widgets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* return view('admin::dashboard.index', [
            'totalUsers' => User::totalUsers(),
            'totalFiles' => $this->totalFiles(),
            'thisMonthUsers' => $this->getThisMonthUsers(),
            'thisMonthFiles' => $this->getThisMonthFiles(),
            'todayUsers' => $this->getTodayUsers(),
            'todayFiles' => $this->getTodayFiles(),
            'activatUsers' => $this->getActivatUsers(),
            'totalDownload' => $this->getTotalDownload(),
            'mostDownloadFiles' => $this->getMostDownloadFiles(),
            'totalMissingElection' => $this->getTotalMissingElection(),

        ]);*/
        return redirect()->route('admin.sra.index');
    }

    private function totalFiles()
    {
        $assignFolders=[];
        if(setting('auto_assign_folder_files') && !auth()->user()->isAdmin()){
            $folders=auth()->user()->folders;
            if($folders->isNotEmpty()) {
                $assignFolders=auth()->user()->folders()->pluck('id')->toArray();
            }
        }
        return Files::when(!auth()->user()->isAdmin(),function($query) use ($assignFolders) {
                if(!empty($assignFolders)){
                    $query->Where(function ($q) use ($assignFolders) {
                        $q->Where('user_id', auth()->user()->id);
                        $q->orWhereIn('folder_id', $assignFolders);
                    });
                }else{
                    $query->where('user_id', auth()->user()->id);
                }
            })->count();
    }
    private function getThisMonthUsers()
    {
        return Role::findOrNew(setting('user_role'))->users()->where(
            'users.created_at', '>=', Carbon::now()->startOfMonth()->toDateString()
        )->count();
    }
    //Count total missing files in electio n
    private function getTotalMissingElection()
    {
        // return Role::findOrNew(setting('user_role'))->users()->where(
        //     'users.created_at', '>=', Carbon::now()->startOfMonth()->toDateString()
        // )->count();

        $count_files = DB::table('missing_election_details')->count();
        return $count_files;

    }


    private function getThisMonthFiles()
    {
        $assignFolders=[];
        if(setting('auto_assign_folder_files') && !auth()->user()->isAdmin()){
            $folders=auth()->user()->folders;
            if($folders->isNotEmpty()) {
                $assignFolders=auth()->user()->folders()->pluck('id')->toArray();
            }
        }

        return Files::when(!auth()->user()->isAdmin(),function($query) use ($assignFolders) {
                if(!empty($assignFolders)){
                    $query->Where(function ($q) use ($assignFolders) {
                        $q->Where('user_id', auth()->user()->id);
                        $q->orWhereIn('folder_id', $assignFolders);
                    });
                }else{
                    $query->where('user_id', auth()->user()->id);
                }
            })->where(
            'created_at', '>=', Carbon::now()->startOfMonth()->toDateString()
        )->count();
    }

    private function getTodayUsers()
    {

        return Role::findOrNew(setting('user_role'))->users()->where(
            'users.created_at', '>=', Carbon::now()->toDateString()
        )->count();
    }

    private function getTodayFiles()
    {
        $assignFolders=[];
        if(setting('auto_assign_folder_files') && !auth()->user()->isAdmin()){
            $folders=auth()->user()->folders;
            if($folders->isNotEmpty()) {
                $assignFolders=auth()->user()->folders()->pluck('id')->toArray();
            }
        }

        return Files::when(!auth()->user()->isAdmin(),function($query) use ($assignFolders) {
                if(!empty($assignFolders)){
                    $query->Where(function ($q) use ($assignFolders) {
                        $q->Where('user_id', auth()->user()->id);
                        $q->orWhereIn('folder_id', $assignFolders);
                    });
                }else{
                    $query->where('user_id', auth()->user()->id);
                }
            })->where(
            'created_at', '>=', Carbon::now()->toDateString()
        )->count();
    }

    private function getActivatUsers()
    {

        return  User::leftJoin('activations', 'users.id', '=', 'activations.user_id')->leftJoin('user_roles','users.id','=', 'user_roles.user_id')->where('user_roles.role_id',setting('user_role'))->where('activations.completed',1)->count();
    }

    private function getTotalDownload()
    {
        $assignFolders=[];
        if(setting('auto_assign_folder_files') && !auth()->user()->isAdmin()){
            $folders=auth()->user()->folders;
            if($folders->isNotEmpty()) {
                $assignFolders=auth()->user()->folders()->pluck('id')->toArray();
            }
        }

        return Files::when(!auth()->user()->isAdmin(),function($query) use ($assignFolders) {
                if(!empty($assignFolders)){
                    $query->Where(function ($q) use ($assignFolders) {
                        $q->Where('user_id', auth()->user()->id);
                        $q->orWhereIn('folder_id', $assignFolders);
                    });
                }else{
                    $query->where('user_id', auth()->user()->id);
                }
            })->sum('download');
    }

    private function getMostDownloadFiles()
    {
        $assignFolders=[];
        if(setting('auto_assign_folder_files') && !auth()->user()->isAdmin()){
            $folders=auth()->user()->folders;
            if($folders->isNotEmpty()) {
                $assignFolders=auth()->user()->folders()->pluck('id')->toArray();
            }
        }

        return Files::where('download','!=',0)->when(!auth()->user()->isAdmin(),function($query) use ($assignFolders) {
                if(!empty($assignFolders)){
                    $query->Where(function ($q) use ($assignFolders) {
                        $q->Where('user_id', auth()->user()->id);
                        $q->orWhereIn('folder_id', $assignFolders);
                    });
                }else{
                    $query->where('user_id', auth()->user()->id);
                }
            })->orderBy('download','DESC')->limit(10)->get();


    }

}
