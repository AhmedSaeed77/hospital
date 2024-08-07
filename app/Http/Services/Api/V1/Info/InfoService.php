<?php

namespace App\Http\Services\Api\V1\Info;

use App\Http\Resources\V1\Infos\InfosResource;
use App\Http\Traits\GeneralTrait;
use App\Repository\InfoRepositoryInterface;
use App\Http\Traits\Responser;

class InfoService
{
    use Responser;
    use GeneralTrait;
    public function __construct(private InfoRepositoryInterface $repository)
    {

    }

    public function __invoke()
    {
        $data['facebook'] = $this->repository->getValue(['facebook']);
        $data['insta'] = $this->repository->getValue(['insta']);
        $data['linkedin'] = $this->repository->getValue(['linkedin']);
        $data['twitter'] = $this->repository->getValue(['twitter']);
        $data['phone'] = $this->repository->getValue(['phone']);
        $data['location'] = $this->repository->getValue(['location']);
        $data['email'] = $this->repository->getValue(['email']);
        $data['fax'] = $this->repository->getValue(['fax']);
        return $this->returnData('data',$data);
    }
}
