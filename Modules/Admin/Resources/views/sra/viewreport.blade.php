@extends('admin::layout')
<style type="text/css">
    th ,td{
        font-size:16px !important;
    }
</style>

@section('content')
    <div class="row">

        <div class="col-md-6">
            @component('admin::include.page.header')
                @slot('title', clean(trans('Final Report')))
                <li class="nav-item">
                    <a href="#">
                        {{ clean(trans('Final Report')) }}
                    </a>
                </li>
            @endcomponent
        </div>

    </div>

    <div class="table-responsive" id="sra-table">
        <table class="table table-hover table-striped table-responsive">
            <thead>
                
                <tr>
                    <th rowspan='2' style='text-align: center;'>Serial Number</th>
                    <!-- <th>Hut_id</th> -->
                    <th rowspan='2' style='text-align: center;'>Hut Owner Name</th>
                    <!-- <th>Address</th> -->
                    <th rowspan='2' style='text-align: center;'>Use <br> Residential/Commercial/Amenity/Construction/Religious Construction</th>
                    <th rowspan='2' style='text-align: center;'>Areas below residential/non-residential use</th>
                    <th rowspan='2' style='text-align: center;'>Documents Sumitted By Hut Owner</th> 
                 
                    <th colspan='2' style='text-align: center;'>Competent Authority's opinion on eligibility</th>
                </tr>
                <tr>
                    <th style='text-align: center;'>Eligible/Not Eligible/Undecided</th>
                    <th style='text-align: center;'>Final Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sims as $key => $sim)
                    @foreach ($sim->hutOwners as $hutOwner)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            {{--<td>{{ $sim->hut_id }}</td>--}}
                            <td>{{ $sim->hutOwnerName }}</td>
                            {{--<td>{{ $sim->address }}</td>--}}
                            <td>{{ $sim->Category }}</td>
                            <td>{{ $sim->Area }}</td>
                            {{-- <td>{{ $sim->document  }}</td>  --}}
                            <td>
                                @if ($sim->electricity_status == 1)
                                    Electricity <br>
                                @endif
                                @if ($sim->election_status == 1)
                                    Election <br>
                                @endif
                                @if ($sim->gumasta_status == 1)
                                    Gumasta <br>
                                @endif
                                @if ($sim->photopass_status == 1)
                                    Photopass <br>
                                @endif
                                @if ($sim->agreement_status == 1)
                                    Registration Agreement <br>
                                @endif
                                @if ($sim->adhar_status == 1)
                                    Adhar Card <br>
                                @endif
                            </td>
                            <td>
                                @if ($hutOwner->overall_status == 1)
                                    <span style="color: green;">Eligible</span>
                                @elseif ($hutOwner->overall_status == 2)
                                    <span style="color: red;">Not Eligible</span>
                                @else
                                    <span style="color: orange;">Undecided</span>
                                @endif
                            </td>
                            <td>{{ $hutOwner->overall_remark }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>           
        </table>
    </div>

    
@endsection
    
    