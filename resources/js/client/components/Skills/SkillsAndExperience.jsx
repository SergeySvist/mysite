import React, { useEffect, useState } from 'react';
import { baseURL } from '../../config';
import Skill from './Skill';

const client = axios.create({baseURL});

const SkillsAndExperience = () => {
    let [exp, setExp] = useState({});
    let [skills, setSkills] = useState([]);
    useEffect(()=>{
        const getExp = async ()=>{
            const resp = await client.get('/api/experiences', {params: {lang: "en"}});
            setExp(resp.data.data[0]);
        }
        const getSkills = async ()=>{
            const resp = await client.get('/api/skills');
            setSkills(resp.data.data[0]);
        }

        getExp();
        getSkills();
    }, []);

    return (
        <div className='skills-exp'>
            <div className="text">
                <h1>Skills & Experience</h1>
                <p>
                    {exp.description && 
                        exp.description.split('\n').map((item, key) => {
                        return <React.Fragment key={key}>{item}<br/></React.Fragment>
                    })}
                </p>
            </div>
            <div className='skills'>
                {skills.map(skill=><Skill skill={skill} key={skill.id} />)}
            </div>
        </div>
    );
}

export default SkillsAndExperience;
