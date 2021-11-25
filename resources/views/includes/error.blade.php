@if($errors->all())
    @foreach($errors->all() as $error)
        <div class="box no-border">
            <div class="box-tools">
                <p class="alert alert-danger alert-dismissible">
                    {{ $error }}
                    <button type="button" class="close closealert" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </p>
            </div>
        </div>
    @endforeach
@elseif(session()->has('success'))
    <div class="box no-border" id="divSuccess">
        <div class="box-tools">
            <p class="alert alert-success alert-dismissible">
                <b>{{ explode(",",session()->get('success'))[0] }}</b> <b style="color: #DD0031">{{ count(explode(",",session()->get('success'))) > 1 ? explode(",",session()->get('success'))[1] :'' }}</b>
                <button type="button" class="close closealert" id="closeSuccess" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </p>
        </div>
    </div>
@elseif(session()->has('error'))
    <div class="box no-border" id="divError"> 
        <div class="box-tools">
            <p class="alert alert-danger alert-dismissible">
                {{ session()->get('error') }}
                <button type="button" class="close closealert" id="closeError" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </p>
        </div>
    </div>
@elseif(session()->has('message'))
    <div class="box no-border">
        <div class="box-tools">
            <p class="alert alert-info alert-dismissible">
                {{ session()->get('message') }}
                <button type="button" class="close closealert" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </p>
        </div>
    </div>
@endif
