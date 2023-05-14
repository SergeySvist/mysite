import React from 'react';

const Project = ({project}) => {
    console.log(project.project_files_data[0].file_url);
    return (
        <div className='list-item'>
            <img src={project.project_files_data[0].file_url} alt="" width="100%"/>
            <p>{project.title}</p>
        </div>
    );
}

export default Project;
