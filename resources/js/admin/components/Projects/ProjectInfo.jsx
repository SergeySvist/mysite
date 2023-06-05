import React, { useState } from 'react';

const ProjectInfo = ({project}) => {


    return (
        <div>
            <div className='project-info'></div>

            <button type="button" class="project-btn" data-bs-toggle="modal" data-bs-target={`#projectModal${project.id}`}>
                Edit
            </button>

            <div class="project-modal modal fade" id={`projectModal${project.id}`} tabindex="-1" aria-labelledby={`projectModal${project.id}Label`} aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <input type="text" value={project.title} />
                    <button type="button" class="btn text-light fs-3" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
                </div>
                <div class="modal-body">
                    <label htmlFor="">Link:</label> <br/>
                    <input type="text" value={project.link}/>
                    <label htmlFor="">Image:</label><br/>
                    <input type="file" name="" id="" className='form-control'/>
                    <label htmlFor="">Description:</label> <br/>
                    <textarea name="" id="" rows="10" value={project.description}></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Edit</button>
                </div>
                </div>
            </div>
            </div>        
        </div>
    );
}

export default ProjectInfo;
