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
                        <div class="btn-group btn-group-sm" role="group" aria-label="...">
                            <button wire:click="view({{ $item }})" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-info">View</button>
                            <button wire:click="edit({{ $item }})" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-warning">Edit</button>
                            <button wire:click="delete({{ $item }})" class="btn btn-danger">Delete</button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No borrowers yet!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $borrowers->links() }}

    <div class="modal" id="showModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Borrower</h5>
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

    <div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Borrower</h5>
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
                            <input type="date" class="form-control" wire:model="borrower.dob" placeholder="Enter date">
                            {{--                    <x-jet-input-error for="dob" class="mt-2" />--}}
                        </div>
                        <div class="form-group col-lg-6 col-md-12">
                            <label class="form-label">Monthly Sales</label>
                            <input type="number" class="form-control" wire:model="borrower.monthly_sales">
                            {{--                    <x-jet-input-error for="dob" class="mt-2" />--}}
                        </div>
                        <div class="form-group col-lg-6 col-md-12">
                            <label class="form-label">Monthly Expenses</label>
                            <input type="number" class="form-control" wire:model="borrower.monthly_expenses">
                            {{--                    <x-jet-input-error for="dob" class="mt-2" />--}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="save" type="button" class="btn btn-primary">Save Borrower</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
