import React, { useContext, useState } from 'react';
import { useParams } from 'react-router-dom';
import { BlogContextData } from '../../contexts/BlogContext';
import ReactMarkdown from 'react-markdown';
import rehypeRaw from 'rehype-raw';
import emojione from 'emojione';

const BlogEdit = () => {
    const {id} = useParams();
    const {blogs, handlers, loading} = useContext(BlogContextData);
    const blog = blogs.find(blog => blog.id === +id);

    const [text, setText] = useState(loading ? "" : blog.main_text);
    const [title, setTitle] = useState(loading ? "" : blog.title);
    const [img, setImg] = useState(null);

    const emojified = loading? "" : emojione.shortnameToImage(text);
    return (
        <div className='blogPage'>
            <div className="edit">
                <label htmlFor="">Title:</label> <br/>
                <input type="text" value={title} onChange={(e)=>{setTitle(e.target.value)}}/><br/><br/>

                <label htmlFor="">Image:</label> <br/>
                <input type="file" className='form-control' value={img} onChange={(e)=>{setImg(e.target.files[0])}}/><br/>

                <label htmlFor="">Text:</label> <br/>
                <textarea name="" id="" rows="20" placeholder='Input here...' value={text} onChange={(e)=>{setText(e.target.value)}}></textarea>
                <div className="buttons">
                    <button type="button" className="btn btn-danger" onClick={()=>{handlers.deleteBlog(blog.id)}}>Delete</button>
                    <button type="button" className="btn btn-primary" onClick={()=>{handlers.updateBlog({id: blog.id ,title, main_text: text, avatar: img})}}>Confirm</button>
                </div>
            </div>
            <div className="text">
                <label htmlFor="">Preview:</label> <br/><br/>
                <h1>{!loading && title}</h1>
                {!loading && <img src={blog.blog_files_data[0].file_url} alt="" width="100%" height="400px"/>}

                {!loading && <ReactMarkdown rehypePlugins={[rehypeRaw]}>{emojified}</ReactMarkdown>}
            </div>
        </div>
    );
}

export default BlogEdit;
