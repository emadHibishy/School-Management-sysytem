<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showAddForm" type="button">{{ __('parents.add_parent') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-striped table-sm table-bordered p-0 text-center" data-page-length="50">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('parents.email') }}</th>
            <th>{{ __("parents.father_name") }}</th>
            <th>{{ __("parents.mother_name") }}</th>
            <th>{{ __("parents.father_job") }}</th>
            <th>{{ __("parents.mother_job") }}</th>
            <th>{{ __('parents.father_phone') }}</th>
            <th>{{ __('parents.operations') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($parents as $aparent)
            <tr>

                <td>{{ $loop->iteration }}</td>
                <td>{{ $aparent->email }}</td>
                <td>{{ $aparent->father_name }}</td>
                <td>{{ $aparent->mother_name }}</td>
                <td>{{ $aparent->father_job }}</td>
                <td>{{ $aparent->mother_job }}</td>
                <td>{{ $aparent->father_phone }}</td>
                <td>
                    <button wire:click="edit({{ $aparent->id }})" title="{{ __('parents.edit') }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $aparent->id }})" title="{{ __('parents.delete') }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
