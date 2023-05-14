import React, { useEffect, useState } from 'react';
import { baseURL } from '../../config';
import Project from './Project';

const client = axios.create({baseURL});

const ProjectList = () => {
    let [projects, setProjects] = useState([]);

    useEffect(()=>{
        const getProjects = async () =>{
            const resp = await client.get('/api/projects');
            setProjects(resp.data.data[0]);
        }
        getProjects();
    }, []);

    return (
        <div className='projectList'>
            <div className="header">
                <h1>My works:</h1>
                <div className="search-container">
                    <input className='search' type="text" placeholder='Input project name or tag'/>
                    <button className='btn btn-dark'><i class="bi bi-search"></i></button>
                </div>
            </div>
            <div className='list'>
                {projects.map(proj=><Project project={proj} key={proj.id}></Project>)}
            </div>
        </div>
    );
}

export default ProjectList;
