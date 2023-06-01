import React, { useContext, useEffect, useState } from 'react';
import { baseURL } from '../../config';
import Skill from './Skill';
import { AuthContextData } from '../../contexts/AuthContext';
import AddSkill from './AddSkill';

const client = axios.create({baseURL});

const SkillsAndExperience = () => {
    const {token, login, logout} = useContext(AuthContextData);

    let [exp, setExp] = useState('');
    let [skills, setSkills] = useState([]);
    useEffect(()=>{
        const getExp = async ()=>{
            const resp = await client.get('/api/experiences', {params: {lang: "en"}});
            setExp(resp.data.data[0].description);
        }
        const getSkills = async ()=>{
            const resp = await client.get('/api/skills');
            setSkills(resp.data.data[0]);
        }

        getExp();
        getSkills();
    }, []);

    const updateExp = async ()=>{
        const resp = await client.post('/api/experiences', {description: exp}, {params: {lang: "en", _method: "PATCH"}, headers: {'Authorization':`Bearer ${token}`}} );
        setExp(resp.data.data[0].description);
        console.log(resp);
    }

    const deleteSkill = async (id)=>{
        const resp = await client.delete(`/api/skills/${id}`, {headers: {'Authorization':`Bearer ${token}`}});
        setSkills(skills.filter(skill => skill.id !== resp.data.data[0]));
        console.log(resp);
    }

    const addSkill = async (skill)=>{
        const resp = await client.post(`/api/skills`, {title: skill.title, rate: skill.rate}, {headers: {'Authorization':`Bearer ${token}`}});
        setSkills([...skills, resp.data.data[0]]);
        console.log(resp);
    }
    return (
        <div className='skills-exp'>
            <div className="text">
                <h1>Skills & Experience</h1>
                <textarea  type="text" value={exp} onChange={(e)=>{setExp(e.target.value)}}/>

                <button className='btn btn-primary' onClick={updateExp}>Send</button>

            </div>
            <div className='skills'>
                {skills.map(skill=><Skill skill={skill} deleteHandler={deleteSkill} key={skill.id} />)}
                <AddSkill addHandler={addSkill}></AddSkill>
            </div>


        </div>
    );
}

export default SkillsAndExperience;
