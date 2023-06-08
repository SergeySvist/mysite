import React from 'react';
import ProjectModal from './ProjectModal';

const Project = ({project, actions}) => {
    //console.log(project);
    return (
        <div className='list-item'>
            <img src={project.project_files_data[0].file_url} alt="" width="100%" height="80%"/>
            <p>{project.title}</p>
            <ProjectModal project={project} actions={actions}></ProjectModal>
        </div>
    );
}

export default Project;
