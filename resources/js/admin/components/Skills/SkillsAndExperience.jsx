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
                <textarea  type="text" value={exp.description} />

                <button className='btn btn-primary'>Send</button>

            </div>
            <div className='skills'>
                {skills.map(skill=><Skill skill={skill} key={skill.id} />)}
                <div className='skill'>
                    <button class="circle btn" style={{backgroundImage: `conic-gradient(#304d86 100%, #8ca0c9 0)`}}>
                        <div class="inner "><i class="bi bi-plus-circle fs-1"></i></div>
                    </button>
                </div>
            </div>


        </div>
    );
}

export default SkillsAndExperience;
