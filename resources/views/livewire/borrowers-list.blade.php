<div>
    <div>
        <button  data-toggle="modal" data-target="#showModal" class="btn btn-primary pull-right mb-3">Add Borrower</button>
    </div>
    <table class="table table-striped">
        <thead>
            <th>S/N</th>
            <th>Email</th>
            <th>DOB</th>
            <th>Monthly Sales</th>
            <th>Monthly Expenses</th>
            <th>Action</th>
        </thead>
        <tbody>
            @forelse($borrowers as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->dob }}</td>
                    <td>{{ $item->monthly_sales }}</td>
                    <td>{{ $item->monthly_expenses }}</td>
                    <td>
                        <button class="btn btn-group">
                            <button wire:click="view" class="btn btn-info">View</button>
                            <button wire:click="edit" class="btn btn-warning">Edit</button>
                            <button wire:click="delete" class="btn btn-danger">Delete</button>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No borrowers yet!</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="modal" id="showModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" wire:model="email" placeholder="Enter Email">
                            {{--                    <x-jet-input-error for="email" class="mt-2" />--}}
                        </div>
                        <div class="form-group col-lg-12 col-md-12">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" wire:model="dob" placeholder="Enter date">
                            {{--                    <x-jet-input-error for="dob" class="mt-2" />--}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="create" type="button" class="btn btn-primary">Create Borrower</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
