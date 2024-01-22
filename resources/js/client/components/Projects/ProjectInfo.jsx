import React, { useState } from 'react';

const ProjectInfo = ({project}) => {


    return (
        <div>
            <div className='project-info'></div>

            <button type="button" class="project-btn" data-bs-toggle="modal" data-bs-target={`#projectModal${project.id}`}>
                View details
            </button>

            <div class="project-modal modal fade" id={`projectModal${project.id}`} tabindex="-1" aria-labelledby={`projectModal${project.id}Label`} aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id={`projectModal${project.id}Label`}>{project.title}</h1>
                    <button type="button" class="btn text-light fs-3" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
                </div>
                <div class="modal-body">
                    <img src={project.project_files_data[0].file_url} alt="" width="100%"/>
                    <p>{project.description}</p>
                    <br />
                    <a href={project.link} className='btn btn-primary'><i className="fa fa-github"/>Github</a>
                </div>
                </div>
            </div>
            </div>
        </div>
    );
}

export default ProjectInfo;
