import React from 'react';

const AddProject = () => {
    return (
        <div class="project-modal modal fade" id={`addProjectModal`} tabindex="-1" aria-labelledby={`addProjectModalLabel`} aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id={`addProjectModalLabel`}>Add new project</h1>
                        <button type="button" class="btn text-light fs-3" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
                    </div>
                    <div class="modal-body">
                        <label htmlFor="">Title:</label><br/>
                        <input type="text" placeholder='Input here...'/><br/>
                        <label htmlFor="">Link:</label><br/>
                        <input type="text" placeholder='Input here...'/><br/>
                        <label htmlFor="">Image:</label><br/>
                        <input type="file" name="" id="" className='form-control'/>
                        <label htmlFor="">Description:</label> <br/>
                        <textarea name="" id="" rows="10" placeholder='Input here...'></textarea>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Add</button>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default AddProject;
