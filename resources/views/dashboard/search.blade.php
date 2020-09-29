<!-- <form class="form-horizontal" action="{{url('company/list')}}" method="GET" target="_blank">
    <div class="row form-group">
        <div class="col-4">
            <input type="text" id="compname" name="compname" placeholder="Enter Company name or CIN" class="form-control">
        </div>
        <div class="col-4">
            <select name="LISTED_FLAG" id="LISTED_FLAG" class="form-control">
                <option value="">Listing Status</option>
                <option value="Listed">Listed</option>
                <option value="Unlisted">Unlisted</option>
            </select>
        </div>
        <div class="col-4">
            <select name="COMPANY_STATUS" id="COMPANY_STATUS" class="form-control">
                <option value="">Company Status</option>
                <option value="ACTV">Active</option>
                <option value="STOF">Strike Off</option>
                <option value="DISD">Disolved</option>
                <option value="AMAL">Amalgamation</option>
                <option LIQD="LIQD">Liquidation</option>
                <option value="DRMT">Dormant</option>
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-4">
            <select name="COMPANY_CLASS" id="COMPANY_CLASS" class="form-control">
                <option value="">Company Class</option>
                <option value="Public">Public</option>
                <option value="Private">Private</option>
                <option value="Private(One Person Company)">Private(One Person Company)</option>
            </select>
        </div>
        <div class="col-4">
            <select name="COMPANY_SUBCAT" id="COMPANY_SUBCAT" class="form-control">
                <option value="">Sub Category</option>
                <option value="Non-govt company">Non-govt company</option>
                <option value="Guarantee and Association comp">Guarantee and Association company</option>
                <option value="State Govt company">State Govt company</option>
                <option value="Union Govt company">Union Govt company</option>
                <option value="Subsidiary of Foreign Company">Subsidiary of Foreign Company</option>
            </select>
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-primary_new btn-md col-sm-4"><i class="fa fa-search"></i>Search</button>
            <button type="reset" class="btn btn-primary_new btn-md col-sm-4">Reset</button>
        </div>
    </div>
</form> -->

<form class="form-horizontal" action="{{url('notice/list')}}" method="GET" target="_blank">
    <div class="row form-group">
        <div class="col-4">
            <input type="text" id="compname" name="searchKey" placeholder="Enter Company name or CIN" class="form-control">
        </div>
        <div class="col-4">
            <select name="inspector" id="inspector" class="form-control">

                <option value="">Select Inspector</option>
                <?php $temp = 0; ?>
                @foreach ($user_list as $row)
                    @if($row->Region !== $temp)
                       <?php $temp = $row->Region;?>
                     <option value="{{ $row->firstName}} ({{$row->Region}})">{{$row->Region}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-4">
            <select name="roc" id="roc" class="form-control">
                <option value="">Select RoC</option>
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-4">
            <select name="provision_id" id="provision_id" class="form-control">
                <option value="">Select Provision</option>
                @foreach ($data_nsr as $row)
                    @if($row->scount>0)
                    <option value="{{$row->provision_id}}">{{$row->provision_id}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-4">
            <select name="year" id="year" class="form-control">
                <option value="">Select Financial Year</option>
                @for ($i = 2017; $i <= date('Y'); $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-primary_new btn-md col-sm-4"><i class="fa fa-search"></i>Search</button>
            <button type="reset" class="btn btn-primary_new btn-md col-sm-4">Reset</button>
        </div>
    </div>
</form>
