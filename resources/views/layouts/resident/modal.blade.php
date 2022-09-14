@if (url()->current() === route('resident.requests.index'))
    {{-- Creating request --}}
    <div class="modal fade" id="m_request" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="m_request_title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" id="m_request_header">
                    <h6 class="modal-title text-white" id="m_request_title">{{-- Modal Title --}}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mt-4">
                    <form class="request_form" autocomplete="off">
                        <div class="form-group mb-2">
                            <label class="form-label">Select Service *</label>
                            <select class="form-control" name="service_id" id="d_services">
                                {{-- display services --}}
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Purpose *</label>
                            <textarea class="form-control" name="purpose" rows="5" placeholder="Add Purpose"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn float-end btn_add_request btn-success"
                        onclick="c_store('.request_form','.request_dt', 'resident.requests.store')">Submit</button>
                    <button type="button" class="btn float-end btn_update_request btn-warning"
                        onclick="c_update('.request_form','.request_dt', 'resident.requests.update', event)">Update</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Creating request --}}
@endif
