import React, { useEffect, useState } from 'react';
import { baseURL } from '../../config';
import Project from './Project';
import { useSearchParams } from 'react-router-dom';

const client = axios.create({baseURL});

const ProjectList = () => {
    const [searchParams, setSearchParams] = useSearchParams();

    let [projects, setProjects] = useState([]);

    useEffect(()=>{
        const getProjects = async () =>{
            const resp = await client.get('/api/projects');
            setProjects(resp.data.data[0]);
        }
        getProjects();
    }, []);

    const searchHandler = ({target:{value}}) => {
        setSearchParams({title: value});
    }
    const filterProjects = (proj) => {
        const title = searchParams.get('title');
        if (!title) return true;
        return proj.title.toLowerCase().includes(title.toLowerCase());
    }

    return (
        <div className='projectList'>
            <div className="header">
                <div className="search-container">
                    <input className='search' onChange={searchHandler} value={searchParams.get('title')}  type="text" placeholder='Search by project name or tag...'/>
                    <button className='btn btn-dark'><i class="bi bi-search"></i></button>
                </div>
            </div>
            <div className='list'>
                {projects.filter(filterProjects).map(proj=><Project project={proj} key={proj.id}></Project>)}
            </div>
        </div>
    );
}

export default ProjectList;
