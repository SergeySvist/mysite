import React, { useState } from 'react';

const ProjectModal = ({project, actions}) => {
    let [title, setTitle] = useState(project?project.title:"");
    let [link, setLink] = useState(project?project.link:"");
    let [img, setImg] = useState(null);
    let [desc, setDesc] = useState(project?project.description:"");

    return (
        <div>
            
            {project && <div className='project-info'></div>}

            <button type="button" className={`${project ? "project-btn" : "btn button btn-dark"}`} data-bs-toggle="modal" data-bs-target={`#projectModal${project ? project.id : "Add"}`}>
                {project ? "Edit" : "Add project"}
            </button>

            <div className="project-modal modal fade" id={`projectModal${project ? project.id : "Add"}`} tabindex="-1" aria-labelledby={`projectModal${project ? project.id : "Add"}Label`} aria-hidden="true">
            <div className="modal-dialog">
                <div className="modal-content">
                <div className="modal-header">
                    <h1 className="modal-title fs-5" id={`projectModal${project ? project.id : "Add"}Label`}>{project ? "Edit" : "Add"} project</h1>
                    <button type="button" className="btn text-light fs-3" data-bs-dismiss="modal" aria-label="Close"><i className="bi bi-x"></i></button>
                </div>
                <div className="modal-body">
                    <label htmlFor="">Title:</label><br/>
                    <input type="text" placeholder='Input here...' value={title} onChange={(e)=>{setTitle(e.target.value)}}/><br/>
                    <label htmlFor="">Link:</label><br/>
                    <input type="text" placeholder='Input here...' value={link} onChange={(e)=>{setLink(e.target.value)}}/><br/>
                    <label htmlFor="">Image:</label><br/>
                    <input type="file" name="" id="" className='form-control'/>
                    <label htmlFor="">Description:</label> <br/>
                    <textarea name="" id="" rows="10" placeholder='Input here...' value={desc} onChange={(e)=>{setDesc(e.target.value)}}></textarea>
                </div>
                <div className="modal-footer">
                    <button type="button" className="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {project ? 
                        (<>
                            <button type="button" className="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                            <button type="button" className="btn btn-primary" data-bs-dismiss="modal">Edit</button>
                        </>) : 
                        (   
                            <button type="button" className="btn btn-primary" data-bs-dismiss="modal">Add</button>
                        )
                    }
                </div>
                </div>
            </div>
            </div>        
        </div>
    );
}

export default ProjectModal;
