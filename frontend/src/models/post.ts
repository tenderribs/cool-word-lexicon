import { type User } from '@/models/user'

type PostDTO = {
    id: number;
    term: string;
    description: string;
    usage: string;
    likes: number;
    user: User;
    created_at: Date;
}

export type Post = PostDTO;