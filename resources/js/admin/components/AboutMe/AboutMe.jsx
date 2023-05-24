import React, { useEffect, useState } from 'react';
import { baseURL } from '../../config';
import { useContext } from 'react';
import { AuthContextData } from '../../contexts/AuthContext';
import { useRef } from 'react';

const client = axios.create({baseURL});

const AboutMe = () => {
    const {token, login, logout} = useContext(AuthContextData);

    let [info, setInfo] = useState({});
    let [name, setName] = useState("");


    const updateInfoByProperty = (property, value)=>{
        info[property] = value;
        setInfo(info);
    }

    useEffect(()=>{
        const getInfo = async ()=>{
            const resp = await client.get('/api/info', {params: {lang: "en"}});
            setInfo(resp.data.data[0]);
            setName(resp.data.data[0].name);
            console.log(resp);
        }
        getInfo();
    }, []);

    const updateInfo = async ()=>{
        const resp = await client.patch('/api/info', {params: {name: name, lang: "en"}}, {headers: {'Authorization':`Bearer ${token}`}});
        console.log(resp);
    }

    return (
        <div className='aboutMe'>
            <div className="text">
                <h1>About Me</h1>
                <p>My name is <input type="text" className='names' value={name} onChange={(e)=>{setName(e.target.value)}}/> <input type="text" className='names' value={info.surname} />.</p>
                <textarea  type="text" value={info.description} />
                <a className='btn btn-primary' href={`${baseURL}api/info/download?lang=en&file=cv`}>Upload new CV</a>
            </div>
            <div className="img">
                <button className='btn'>Upload new photo</button>
                <img src={info.avatar_url} alt="" height="500px"/>
            </div>

            <button className='submit' onClick={updateInfo}>Submit <i class="bi bi-box-arrow-in-right"></i></button>

        </div>
    );
}

export default AboutMe;
