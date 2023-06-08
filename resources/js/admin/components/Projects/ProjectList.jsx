import React, { useContext, useEffect, useState } from 'react';
import { baseURL } from '../../config';
import Project from './Project';
import { useSearchParams } from 'react-router-dom';
import ProjectModal from './ProjectModal';
import { AuthContextData } from '../../contexts/AuthContext';

const client = axios.create({baseURL});

const ProjectList = () => {
    const {token, login, logout} = useContext(AuthContextData);

    const [searchParams, setSearchParams] = useSearchParams();

    let [projects, setProjects] = useState([]);

    useEffect(()=>{
        const getProjects = async () => {
            const resp = await client.get('/api/projects');
            setProjects(resp.data.data[0]);
        }
        getProjects();
    }, []);

    const createProject = async (project) => {
        const formData = new FormData();
        formData.append('title', project.title);
        formData.append('link', project.link);
        formData.append('description', project.description);
        formData.append('avatar', project.avatar);
        
        const resp = await client.post("/api/projects", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
            "x-rapidapi-host": "file-upload8.p.rapidapi.com",
            "x-rapidapi-key": "your-rapidapi-key-here",
            'Authorization':`Bearer ${token}`,
          },
          params: {lang: "en"},
        });

        console.log(resp);
        setProjects([...projects, resp.data.data[0]]);
    }
    const deleteProject = async (id)=>{
        const resp = await client.delete(`/api/projects/${id}`, {headers: {'Authorization':`Bearer ${token}`}});
        setProjects(projects.filter(project => project.id !== resp.data.data[0]));
        console.log(resp);
    }
    const updateProject = async (project) => {
        const formData = new FormData();
        formData.append('title', project.title);
        formData.append('link', project.link);
        formData.append('description', project.description);
        project.avatar && formData.append('avatar', project.avatar);
        
        const resp = await client.post(`/api/projects/${project.id}`, formData, {
          headers: {
            "Content-Type": "multipart/form-data",
            "x-rapidapi-host": "file-upload8.p.rapidapi.com",
            "x-rapidapi-key": "your-rapidapi-key-here",
            'Authorization':`Bearer ${token}`,
          },
          params: {lang: "en", _method: "PATCH"},
        });

        console.log(resp);
        setProjects(projects.map(f => f.id === resp.data.data[0].id ? {...resp.data.data[0]} : f));
    }

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
                    <button className='btn search-button btn-dark'><i class="bi bi-search"></i></button>
                    <ProjectModal actions={{createHandler: createProject}}></ProjectModal>
                </div>
            </div>
            <div className='list'>
                {projects.filter(filterProjects).map(proj=><Project project={proj} actions={{deleteHandler: deleteProject, updateHandler: updateProject}} key={proj.id}></Project>)}
            </div>
        </div>
    );
}

export default ProjectList;
