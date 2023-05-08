@extends('admin::layout')

@component('admin::include.page.header')
    @slot('title', clean(trans('admin::sra.electricitytitle')))
    <li class="nav-item">
        <a href="#">
            {{ clean(trans('admin::sra.electricitytitle')) }}
        </a>
    </li>
@endcomponent
@section('content')
<div class="rows" style="display:flex">
    <div class="table-responsive col-sm-4" id="sra-table">
        <style>
            form {
                max-width: 500px;
                margin: 0 auto;
                display: flex;
                flex-direction: column;
                align-items: center;
                font-family: Arial, sans-serif;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 5px;
            }

            label {
                margin-bottom: 10px;
            }

            input,
            select,
            textarea {
                padding: 10px;
                margin-bottom: 20px;
                border-radius: 5px;
                border: 1px solid #ddd;
                font-size: 16px;
                width: 100%;
                box-sizing: border-box;
            }

            select {
                width: 100%;
            }

            textarea {
                resize: vertical;
            }

            button {
                background-color: #4CAF50;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
            }

            button:hover {
                background-color: #3e8e41;
            }
        </style>

        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.missingelectricitydocuments.storemanualdata') }}">
            @csrf
            <input type="hidden" id="hut_id" name="hut_id" value=<?= $hut_id; ?> required>

             <div style="width:100% !important;">
                <label for="category_id">Category ID:</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <?php foreach ($category_options as $option) { ?>
                        <option value="<?= $option ?>"><?= $option ?></option>
                    <?php } ?>
                </select>
            </div>
            <div style="width:100% !important;">
                <label for="year">Year:</label>
                <select id="year" name="year" required>
                    <?php foreach ($year_options as $option) { ?>
                        <option value="<?= $option ?>"><?= $option ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div style="width:100% !important;">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit">Submit</button>
        </form>

    </div>
</div>

@endsection
